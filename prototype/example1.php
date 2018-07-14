<?php

interface Copyable
{
    public function copy();
}

class Project implements Copyable
{
    private $id;
    private $projectName;
    private $sourceCode;

    /**
     * Project constructor.
     * @param $id
     * @param $projectName
     * @param $sourceCode
     */
    public function __construct($id, $projectName, $sourceCode)
    {
        $this->id = $id;
        $this->projectName = $projectName;
        $this->sourceCode = $sourceCode;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @return mixed
     */
    public function getSourceCode()
    {
        return $this->sourceCode;
    }


    public function copy()
    {
        return new self($this->id, $this->projectName, $this->sourceCode);
    }

    public function getProject()
    {
        return $this;
    }
}

class ProjectFactory
{
    private $project;

    /**
     * ProjectFactory constructor.
     * @param $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    /**
     * @param Project $project
     */
    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function cloneProject() : Project
    {
        return $this->project->copy();
    }

}

$master = new Project(1, 'SuperProject', '$sourceCode = 1;');

echo '<pre>';
print_r($master);
echo '</pre>';


// option 1.
$forkededProjct = $master->copy();
echo '<pre>';
print_r($forkedProjct);
echo '</pre>';



// option 2.
$projectFactory = new ProjectFactory($master);
$forkedProjct2 = $projectFactory->cloneProject();

echo '<pre>';
print_r($forkedProjct);
echo '</pre>';

