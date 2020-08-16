<?php

use Symfony\Component\Yaml\Yaml;

function getProjects(): array
{
    $projects = [];

    foreach (glob(__DIR__ . "/../projects/*.yaml") as $projectFilePath) {
        $projects[] = getProject($projectFilePath);
    }

    return $projects;
}


function getProject(string $filePath)
{
    $fileContent = file_get_contents($filePath);
    return Yaml::parse($fileContent);
}
