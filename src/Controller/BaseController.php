<?php

namespace App\Controller;

use App\Entity\Patient;
use App\Entity\Prescription;
use App\Entity\Produit;
use App\Entity\Follows;
use App\Entity\Users;
use App\Entity\Post;
use App\Entity\Fournisseur;
use App\Entity\LensType;
use App\Entity\LensCoating;
use App\Entity\LensMaterial;
use App\Entity\PrescriptionLensOption;
use App\Entity\Vente;
use App\Entity\Commande;
use App\Entity\LensPrice;
use App\Entity\PrescriptionLensOrder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class BaseController extends AbstractController
{
    private $entityManager;
    private $serializer;

    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    // Existing endpoints for Patient, Prescription, and Produit...

    // Follows
    #[Route('/follows', methods: ['GET'])]
    public function getFollows(): JsonResponse
    {
        $follows = $this->entityManager->getRepository(Follows::class)->findAll();
        $data = $this->serializer->serialize($follows, 'json', ['groups' => 'follow']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/follows', methods: ['POST'])]
    public function createFollow(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $follow = new Follows();
        $follow->setFollowingUserId($data['following_user_id']);
        $follow->setFollowedUserId($data['followed_user_id']);

        $this->entityManager->persist($follow);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($follow, 'json', ['groups' => 'follow']), 201, [], true);
    }

    // Users
    #[Route('/users', methods: ['GET'])]
    public function getUsers(): JsonResponse
    {
        $users = $this->entityManager->getRepository(User::class)->findAll();
        $data = $this->serializer->serialize($users, 'json', ['groups' => 'user']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/users', methods: ['POST'])]
    public function createUser(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $user = new Users();
        $user->setUsername($data['username']);
        $user->setRole($data['role']);
        $user->setCreatedAt(new \DateTimeImmutable('Europe/Paris'));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($user, 'json', ['groups' => 'user']), 201, [], true);
    }

    // Posts
    #[Route('/posts', methods: ['GET'])]
    public function getPosts(): JsonResponse
    {
        $posts = $this->entityManager->getRepository(Post::class)->findAll();
        $data = $this->serializer->serialize($posts, 'json', ['groups' => 'post']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/posts', methods: ['POST'])]
    public function createPost(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $post = new Post();
        $post->setTitle($data['title']);
        $post->setBody($data['body']);
        $post->setUserId($data['user_id']);
        $post->setStatus($data['status']);

        $this->entityManager->persist($post);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($post, 'json', ['groups' => 'post']), 201, [], true);
    }

    // Fournisseurs
    #[Route('/fournisseurs', methods: ['GET'])]
    public function getFournisseurs(): JsonResponse
    {
        $fournisseurs = $this->entityManager->getRepository(Fournisseur::class)->findAll();
        $data = $this->serializer->serialize($fournisseurs, 'json', ['groups' => 'fournisseur']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/fournisseurs', methods: ['POST'])]
    public function createFournisseur(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $fournisseur = new Fournisseur();
        $fournisseur->setNomDuFournisseur($data['nom_du_fournisseur']);
        $fournisseur->setAdresseDuFournisseur($data['adresse_du_fournisseur']);
        $fournisseur->setNumeroDeTelephoneDuFournisseur($data['numero_de_telephone_du_fournisseur']);

        $this->entityManager->persist($fournisseur);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($fournisseur, 'json', ['groups' => 'fournisseur']), 201, [], true);
    }

    // LensTypes
    #[Route('/lens-types', methods: ['GET'])]
    public function getLensTypes(): JsonResponse
    {
        $lensTypes = $this->entityManager->getRepository(LensType::class)->findAll();
        $data = $this->serializer->serialize($lensTypes, 'json', ['groups' => 'lens_type']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/lens-types', methods: ['POST'])]
    public function createLensType(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $lensType = new LensType();
        $lensType->setLensTypeName($data['lens_type_name']);
        $lensType->setDescription($data['description']);

        $this->entityManager->persist($lensType);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($lensType, 'json', ['groups' => 'lens_type']), 201, [], true);
    }

    // LensCoatings
    #[Route('/lens-coatings', methods: ['GET'])]
    public function getLensCoatings(): JsonResponse
    {
        $lensCoatings = $this->entityManager->getRepository(LensCoating::class)->findAll();
        $data = $this->serializer->serialize($lensCoatings, 'json', ['groups' => 'lens_coating']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/lens-coatings', methods: ['POST'])]
    public function createLensCoating(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $lensCoating = new LensCoating();
        $lensCoating->setCoatingName($data['coating_name']);
        $lensCoating->setDescription($data['description']);
        $lensCoating->setAdditionalProperties($data['additional_properties']);

        $this->entityManager->persist($lensCoating);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($lensCoating, 'json', ['groups' => 'lens_coating']), 201, [], true);
    }

    // LensMaterials
    #[Route('/lens-materials', methods: ['GET'])]
    public function getLensMaterials(): JsonResponse
    {
        $lensMaterials = $this->entityManager->getRepository(LensMaterial::class)->findAll();
        $data = $this->serializer->serialize($lensMaterials, 'json', ['groups' => 'lens_material']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/lens-materials', methods: ['POST'])]
    public function createLensMaterial(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $lensMaterial = new LensMaterial();
        $lensMaterial->setMaterialName($data['material_name']);
        $lensMaterial->setDescription($data['description']);
        $lensMaterial->setRefractiveIndex($data['refractive_index']);
        $lensMaterial->setDensity($data['density']);
        $lensMaterial->setAbbeValue($data['abbe_value']);

        $this->entityManager->persist($lensMaterial);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($lensMaterial, 'json', ['groups' => 'lens_material']), 201, [], true);
    }

    // PrescriptionLensOptions
    #[Route('/prescription-lens-options', methods: ['GET'])]
    public function getPrescriptionLensOptions(): JsonResponse
    {
        $options = $this->entityManager->getRepository(PrescriptionLensOption::class)->findAll();
        $data = $this->serializer->serialize($options, 'json', ['groups' => 'prescription_lens_option']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/prescription-lens-options', methods: ['POST'])]
    public function createPrescriptionLensOption(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $option = new PrescriptionLensOption();
        $option->setOptionName($data['option_name']);
        $option->setDescription($data['description']);
        $option->setAdditionalProperties($data['additional_properties']);

        $this->entityManager->persist($option);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($option, 'json', ['groups' => 'prescription_lens_option']), 201, [], true);
    }

    // Ventes
    #[Route('/ventes', methods: ['GET'])]
    public function getVentes(): JsonResponse
    {
        $ventes = $this->entityManager->getRepository(Vente::class)->findAll();
        $data = $this->serializer->serialize($ventes, 'json', ['groups' => 'vente']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/ventes', methods: ['POST'])]
    public function createVente(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $vente = new Vente();
        $vente->setIdProduit($data['id_produit']);
        $vente->setIdPatient($data['id_patient']);
        $vente->setDateDeVente(new \DateTime($data['date_de_vente']));
        $vente->setQuantiteVendue($data['quantite_vendue']);
        $vente->setPrixUnitaire($data['prix_unitaire']);
        $vente->setTotalDeLaVente($data['total_de_la_vente']);

        $this->entityManager->persist($vente);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($vente, 'json', ['groups' => 'vente']), 201, [], true);
    }

    // Commandes
    #[Route('/commandes', methods: ['GET'])]
    public function getCommandes(): JsonResponse
    {
        $commandes = $this->entityManager->getRepository(Commande::class)->findAll();
        $data = $this->serializer->serialize($commandes, 'json', ['groups' => 'commande']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/commandes', methods: ['POST'])]
    public function createCommande(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $commande = new Commande();
        $commande->setIdFournisseur($data['id_fournisseur']);
        $commande->setDateDeCommande(new \DateTime($data['date_de_commande']));
        $commande->setIdProduit($data['id_produit']);
        $commande->setQuantiteCommandee($data['quantite_commandee']);
        $commande->setPrixUnitaire($data['prix_unitaire']);
        $commande->setTotalDeLaCommande($data['total_de_la_commande']);

        $this->entityManager->persist($commande);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($commande, 'json', ['groups' => 'commande']), 201, [], true);
    }

    // LensPrices
    #[Route('/lens-prices', methods: ['GET'])]
    public function getLensPrices(): JsonResponse
    {
        $lensPrices = $this->entityManager->getRepository(LensPrice::class)->findAll();
        $data = $this->serializer->serialize($lensPrices, 'json', ['groups' => 'lens_price']);
        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/lens-prices', methods: ['POST'])]
    public function createLensPrice(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $lensPrice = new LensPrice();
        $lensPrice->setLensTypeId($data['lens_type_id']);
        $lensPrice->setMaterialId($data['material_id']);
        $lensPrice->setCoatingId($data['coating_id']);
        $lensPrice->setOptionId($data['option_id']);
        $lensPrice->setBasePrice($data['base_price']);

        $this->entityManager->persist($lensPrice);
        $this->entityManager->flush();

        return new JsonResponse($this->serializer->serialize($lensPrice, 'json', ['groups' => 'lens_price']), 201, [], true);
    }

    // PrescriptionLensOrders
    #[Route('/prescription-lens-orders', methods: ['GET'])]
    public function getPrescriptionLensOrders(): JsonResponse
    {
        $orders = $this->entityManager->getRepository(PrescriptionLensOrder::class)->findAll();
        $data = $this->serializer->serialize($orders, 'json', ['groups' => 'prescription_lens_order']);
        return new JsonResponse($data, 200, [], true);
    }
}