<?php

namespace App\Security;

use App\Entity\Admin;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AuthAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UrlGeneratorInterface $urlGenerator, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->urlGenerator = $urlGenerator;
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function authenticate(Request $request): Passport
    {
        $name = $request->request->get('name', '');
        $password = $request->request->get('password', '');

        $request->getSession()->set(Security::LAST_USERNAME, $name);

        return new Passport(
            new UserBadge($name, function ($userIdentifier) use ($password) {
                $user = $this->entityManager->getRepository(User::class)->findOneBy(['name' => $userIdentifier]);
                if ($user) {
                    // Vérifier le mot de passe pour l'utilisateur
                    if (!$this->passwordHasher->isPasswordValid($user, $password)) {
                        throw new AuthenticationException('Identifiants incorrects.');
                    }
                    return $user; // Retourner l'utilisateur trouvé
                } else {
                    $admin = $this->entityManager->getRepository(Admin::class)->findOneBy(['name' => $userIdentifier]);
                    if ($admin) {
                        // Vérifier le mot de passe pour l'admin
                        if (!$this->passwordHasher->isPasswordValid($admin, $password)) {
                            throw new AuthenticationException('Identifiants incorrects.');
                        }
                        return $admin; // Retourner l'admin trouvé
                    } else {
                        throw new AuthenticationException('Utilisateur non trouvé.');
                    }
                }
            }),
            new PasswordCredentials($password),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
