<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use App\Entity\Epargne;
use App\Entity\Groupement;
use App\Entity\Membre;
use App\Entity\Participation;
use App\Entity\Tontine;
use App\Entity\Versement;
use App\Enum\Fonction;
use App\Enum\StatutVersement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        // 1. Groupement
        $groupement = new Groupement();
        $groupement->setNomGroupement('Femmes Solidaires');
        $groupement->setTelephone('771234567');

        $manager->persist($groupement);

        // 2. Admin
        $admin = new Admin();
        $admin->setLogin('admin');
        $admin->setNomComplet('Awa Diop');
        $admin->setTelephone('770000001');
        $admin->setAdresse('Dakar');
        $admin->setIsActif(true);
        $admin->setFonction(Fonction::PRESIDENTE);
        $admin->setGroupement($groupement);
        $admin->setRoles(['ROLE_ADMIN']);

        $admin->setPassword(
            $this->passwordHasher->hashPassword($admin, 'admin123')
        );

        $manager->persist($admin);

        // 3. Membre
        $membre = new Membre();
        $membre->setLogin('fatou');
        $membre->setNomComplet('Fatou Ndiaye');
        $membre->setTelephone('770000002');
        $membre->setAdresse('Dakar');
        $membre->setIsActif(true);
        $membre->setFonction(Fonction::TRESORIERE);
        $membre->setGroupement($groupement);
        $membre->setRoles(['ROLE_USER']);

        $membre->setPassword(
            $this->passwordHasher->hashPassword($membre, 'membre123')
        );

        $manager->persist($membre);

        // 4. Campagne Tontine
        $tontine = new Tontine();
        $tontine->setNom('Tontine 2026');
        $tontine->setDateDebut(new \DateTime('2026-10-01'));
        $tontine->setDateFin(new \DateTime('2027-03-31'));
        $tontine->setMontantCotisation(5000);
        $tontine->setGroupement($groupement);

        $manager->persist($tontine);

        // 5. Campagne Epargne
        $epargne = new Epargne();
        $epargne->setNom('Epargne 2026');
        $epargne->setDateDebut(new \DateTime('2026-10-01'));
        $epargne->setDateFin(new \DateTime('2027-03-31'));
        $epargne->setMontantCotisation(10000);
        $epargne->setTauxInteretPret(10);
        $epargne->setGroupement($groupement);

        $manager->persist($epargne);

        // 6. Participation de Fatou à l'épargne
        $participation = new Participation();
        $participation->setDateInscription(new \DateTime('2026-10-01'));
        $participation->setIsTotale(true);
        $participation->setMontantCotisation(null);
        $participation->setMembre($membre);
        $participation->setCampagne($epargne);

        $manager->persist($participation);

        // 7. Versement
        $versement = new Versement();
        $versement->setDatePrevue(new \DateTime('2026-10-05'));
        $versement->setStatutVersement(StatutVersement::VERSE);
        $versement->setParticipation($participation);

        $manager->persist($versement);

        $manager->flush();
    }
}