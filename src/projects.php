<?php

use Symfony\Component\Yaml\Yaml;

function getProjects(): array
{
    $projects = [];

    foreach (glob(__DIR__ . "/../projects/*.yml") as $projectFilePath) {
        $projects[] = getProject($projectFilePath);
    }

    return $projects;
}


function getProject(string $filePath)
{
    $fileContent = file_get_contents($filePath);
    $project = Yaml::parse($fileContent);

    $name = basename($filePath);

    $project["name"] = $name;

    return $project;
}
