<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Project
 *
 * @ORM\Table(name="build")
 * @ORM\Entity()
 */
class Build
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
     * @var integer
     *
     * @ORM\Column(name="build_id", type="integer")
     */
    private $buildId;

    /**
     * @var integer
     *
     * @ORM\Column(name="progress", type="integer")
     */
    private $progress;

    /**
     * @var string
     *
     * @ORM\Column(name="start", type="datetime")
     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @var string
     *
     * @ORM\Column(name="from_branch", type="string", nullable=false)
     */
    private $fromBranch;

    /**
     * @var string
     *
     * @ORM\Column(name="to_branch", type="string", nullable=false)
     */
    private $toBranch;

    /**
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * Build constructor.
     */
    public function __construct()
    {
        $this->setStart(new \DateTime());
        $this->progress = 0;
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
     * Set start
     *
     * @param \DateTime $start
     *
     * @return Build
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     *
     * @return Build
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set project
     *
     * @param Project $project
     *
     * @return Build
     */
    public function setProject(Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set buildId
     *
     * @param integer $buildId
     *
     * @return Build
     */
    public function setBuildId($buildId)
    {
        $this->buildId = $buildId;

        return $this;
    }

    /**
     * Get buildId
     *
     * @return integer
     */
    public function getBuildId()
    {
        return $this->buildId;
    }

    /**
     * Set progress
     *
     * @param integer $progress
     *
     * @return Build
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;

        return $this;
    }

    /**
     * Get progress
     *
     * @return integer
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * Set fromBranch
     *
     * @param string $fromBranch
     *
     * @return Build
     */
    public function setFromBranch($fromBranch)
    {
        $this->fromBranch = $fromBranch;

        return $this;
    }

    /**
     * Get fromBranch
     *
     * @return string
     */
    public function getFromBranch()
    {
        return $this->fromBranch;
    }

    /**
     * Set toBranch
     *
     * @param string $toBranch
     *
     * @return Build
     */
    public function setToBranch($toBranch)
    {
        $this->toBranch = $toBranch;

        return $this;
    }

    /**
     * Get toBranch
     *
     * @return string
     */
    public function getToBranch()
    {
        return $this->toBranch;
    }
}
