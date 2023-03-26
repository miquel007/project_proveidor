<?php

namespace App\Entity;

use App\Repository\ProveidorRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ProveidorRepository::class)
 */
class Proveidor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 60,
     *      minMessage = "Tu nombre debe tener al menos {{ limit }} caracteres",
     *      maxMessage = "Tu nombre no puede ser mayor a {{ limit }} caracteres"
     * )
     * @ORM\Column(type="string", length=60)
     */
    private $nom;

    /**
     * @Assert\Email(
     *     message = "El email '{{ value }}' no es un email válido.",
     *     checkMX = true
     * )
     * @ORM\Column(type="string", length=60)
     */
    private $mail;

    /**
     * @Assert\Length(
     *      min = 9,
     *      minMessage = "Tu telefono debe tener al menos {{ limit }} numeros",
     * )
     * @ORM\Column(type="integer")
     */
    private $telefon;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $tipus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actiu;

    /**
     * @ORM\Column(type="date")
     */
    private $data_alta;

    /**
     * @ORM\Column(type="date")
     */
    private $data_modificacio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    public function getTipus(): ?string
    {
        return $this->tipus;
    }

    public function setTipus(string $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function getActiu(): ?bool
    {
        return $this->actiu;
    }

    public function setActiu(bool $actiu): self
    {
        $this->actiu = $actiu;

        return $this;
    }

    public function getDataAlta(): ?\DateTimeInterface
    {
        return $this->data_alta;
    }

    public function setDataAlta(\DateTimeInterface $data_alta): self
    {
        $this->data_alta = $data_alta;

        return $this;
    }

    public function getDataModificacio(): ?\DateTimeInterface
    {
        return $this->data_modificacio;
    }

    public function setDataModificacio(\DateTimeInterface $data_modificacio): self
    {
        $this->data_modificacio = $data_modificacio;

        return $this;
    }
}
