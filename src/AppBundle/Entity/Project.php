<?php

namespace AppBundle\Entity;

use AppBundle\Helper\SshKeyHelper;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity()
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="git_ssh_link", type="string", length=255)
     */
    private $gitSshLink;

    /**
     * @var string
     *
     * @ORM\Column(name="git_private_key", type="text", nullable=false)
     */
    private $gitPrivateKey;

    /**
     * @var string
     *
     * @ORM\Column(name="git_public_key", type="text", nullable=false)
     */
    private $gitPublicKey;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="default_branch", type="string", nullable=false)
     */
    private $defaultBranch;

    /**
     * Project constructor.
     */
    public function __construct()
    {
        $keys = SshKeyHelper::generate();
        $this->setGitPrivateKey($keys['private_key']);
        $this->setGitPublicKey($keys['public_key']);
        $this->setDefaultBranch('master');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set gitSshLink
     *
     * @param string $gitSshLink
     *
     * @return Project
     */
    public function setGitSshLink($gitSshLink)
    {
        $this->gitSshLink = $gitSshLink;

        return $this;
    }

    /**
     * Get gitSshLink
     *
     * @return string
     */
    public function getGitSshLink()
    {
        return $this->gitSshLink;
    }

    /**
     * Set gitPrivateKey
     *
     * @param string $gitPrivateKey
     *
     * @return Project
     */
    public function setGitPrivateKey($gitPrivateKey)
    {
        $this->gitPrivateKey = $gitPrivateKey;

        return $this;
    }

    /**
     * Get gitPrivateKey
     *
     * @return string
     */
    public function getGitPrivateKey()
    {
        return $this->gitPrivateKey;
    }

    /**
     * Set gitPublicKey
     *
     * @param string $gitPublicKey
     *
     * @return Project
     */
    public function setGitPublicKey($gitPublicKey)
    {
        $this->gitPublicKey = $gitPublicKey;

        return $this;
    }

    /**
     * Get gitPublicKey
     *
     * @return string
     */
    public function getGitPublicKey()
    {
        return $this->gitPublicKey;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Project
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set defaultBranch
     *
     * @param string $defaultBranch
     *
     * @return Project
     */
    public function setDefaultBranch($defaultBranch)
    {
        $this->defaultBranch = $defaultBranch;

        return $this;
    }

    /**
     * Get defaultBranch
     *
     * @return string
     */
    public function getDefaultBranch()
    {
        return $this->defaultBranch;
    }
}
