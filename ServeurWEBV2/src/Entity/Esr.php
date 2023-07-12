<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Esr
 *
 * @ORM\Table(name="esr", indexes={@ORM\Index(name="IDX_B44EAFC1ADAD7EB", columns={"patient"}), @ORM\Index(name="IDX_B44EAFC55CAF762", columns={"etat"}), @ORM\Index(name="IDX_B44EAFC20FD592C", columns={"etablissement"}), @ORM\Index(name="IDX_B44EAFCEA228CDE", columns={"idTypePersonnalEvent"}), @ORM\Index(name="IDX_B44EAFCFAD8DA84", columns={"createur"}), @ORM\Index(name="IDX_B44EAFC514C8FEC", columns={"examen"}), @ORM\Index(name="IDX_B44EAFC278F09F0", columns={"idCritereDeclaration"})})
 * @ORM\Entity
 */
class Esr
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="nomDeclarant", type="string", length=512, nullable=true)
     */
    private $nomdeclarant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="prenomDeclarant", type="string", length=512, nullable=true)
     */
    private $prenomdeclarant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="fonctionDeclarant", type="integer", nullable=true)
     */
    private $fonctiondeclarant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="telephoneDeclarant", type="string", length=255, nullable=true)
     */
    private $telephonedeclarant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailDeclarant", type="string", length=512, nullable=true)
     */
    private $emaildeclarant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateSurvenueESR", type="string", length=255, nullable=true)
     */
    private $datesurvenueesr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateDetectionESR", type="string", length=255, nullable=true)
     */
    private $datedetectionesr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heureSurvenueESR", type="string", length=255, nullable=true)
     */
    private $heuresurvenueesr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="heureDetectionESR", type="string", length=255, nullable=true)
     */
    private $heuredetectionesr;

    /**
     * @var string|null
     *
     * @ORM\Column(name="circonstancesDetection", type="string", length=1024, nullable=true)
     */
    private $circonstancesdetection;

    /**
     * @var int|null
     *
     * @ORM\Column(name="origine", type="integer", nullable=true)
     */
    private $origine;

    /**
     * @var int|null
     *
     * @ORM\Column(name="dispositif", type="integer", nullable=true)
     */
    private $dispositif;

    /**
     * @var int|null
     *
     * @ORM\Column(name="agePersonneConserne", type="integer", nullable=true)
     */
    private $agepersonneconserne;

    /**
     * @var string|null
     *
     * @ORM\Column(name="sex", type="string", length=20, nullable=true)
     */
    private $sex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=20, nullable=true)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="consequencereelleim", type="string", length=1024, nullable=true)
     */
    private $consequencereelleim;

    /**
     * @var string|null
     *
     * @ORM\Column(name="consequencepotentielle", type="string", length=1024, nullable=true)
     */
    private $consequencepotentielle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="actionconservatoires", type="string", length=1024, nullable=true)
     */
    private $actionconservatoires;

    /**
     * @var string|null
     *
     * @ORM\Column(name="actioncorrectives", type="string", length=1024, nullable=true)
     */
    private $actioncorrectives;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateSauvegarde", type="datetime", nullable=true)
     */
    private $datesauvegarde;

    /**
     * @var string|null
     *
     * @ORM\Column(name="typepersonnel", type="string", length=20, nullable=true)
     */
    private $typepersonnel;

    /**
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient", referencedColumnName="id")
     * })
     */
    private $patient;

    /**
     * @var \Etablissement
     *
     * @ORM\ManyToOne(targetEntity="Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etablissement", referencedColumnName="id")
     * })
     */
    private $etablissement;

    /**
     * @var \CritereEsr
     *
     * @ORM\ManyToOne(targetEntity="CritereEsr")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCritereDeclaration", referencedColumnName="id")
     * })
     */
    private $idcriteredeclaration;

    /**
     * @var \Examen
     *
     * @ORM\ManyToOne(targetEntity="Examen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="examen", referencedColumnName="id")
     * })
     */
    private $examen;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etat", referencedColumnName="id")
     * })
     */
    private $etat;

    /**
     * @var \TypePersonnalEvent
     *
     * @ORM\ManyToOne(targetEntity="TypePersonnalEvent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTypePersonnalEvent", referencedColumnName="id")
     * })
     */
    private $idtypepersonnalevent;

    /**
     * @var \UserUser
     *
     * @ORM\ManyToOne(targetEntity="UserUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createur", referencedColumnName="id")
     * })
     */
    private $createur;


}
