<?php
namespace App\DataFixtures;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 25; $i++) {
            $faker = Factory::create('fr_FR');
            $doctor = new User();
            $doctor->setEmail($faker->unique()->email);
            $doctor->setFirstname($faker->unique()->firstName);
            $doctor->setLastname($faker->unique()->lastName);
            $doctor->setBirthday($faker->unique()->dateTime);
            $doctor->setAddress($faker->unique()->address);
            $doctor->setResume($faker->unique()->text);
            $doctor->setPhoto('https://picsum.photos/id/'.$i.'/300/150');
            $doctor->setAvailable($faker->unique()->dateTime);
            $doctor->setCategory($this->getReference('categorie_' . $faker->numberBetween($min = 0, $max = 6)));
            $doctor->setRoles(['ROLE_DOCTOR']);
            $doctor->setPassword($this->passwordEncoder->encodePassword(
                $doctor,
                'doctorPassword'
            ));
            $manager->persist($doctor);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }
}
