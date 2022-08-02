<?php
namespace TestTask\Support;

class ProductsReposDirector
{
    private $currentRepo;

    private $reposClasses = array(
        'Book' => 'App\Repositories\BookRepository',
        'Furniture' => 'App\Repositories\FurnitureRepository',
        'DVD' => 'App\Repositories\DVDRepository'
    );


    private function currentRepoClass($currentRepoType)
    {
        $currentRepoClass = $this->reposClasses[$currentRepoType];

        return $currentRepoClass;
    }

    public function instantiateRepo($type)
    {
        $currentRepoClass =  $this->currentRepoClass($type);
        $this->currentRepo = new $currentRepoClass;

        return $this->currentRepo;
    }

    public function getReposClasses()
    {
        return $this->reposClasses;
    }
}
