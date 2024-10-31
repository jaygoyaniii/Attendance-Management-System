<?php

namespace App\Repository;

use App\Models\Factory\AbstractFactory;
use Auth;

class BaseRepository
{
    /**
     * @var AbstractFactory
     */
    private $modelFactory;

    public function __construct(AbstractFactory $model)
    {
        $this->modelFactory = $model;
    }

    public function save($data)
    {
        return $this->modelFactory->create()->create($data);
    }

    public function showAll()
    {
        return $this->modelFactory->create()->orderby('id','desc')->get();
    }

    public function findByEmail($email)
    {
        return $this->modelFactory->create()->where('email',$email)->first();
    }

    public function findById($id)
    {
        return $this->modelFactory->create()->where('id',$id)->first();
    }

    public function update($id, $data)
    {
        return $this->modelFactory->create()->where('id',$id)->update($data);
    }

    public function destroy($id)
    {
        return $this->modelFactory->create()->where('id',$id)->update(['is_deleted'=>'true']);
    }

    public function countRecord()
    {
        return $this->modelFactory->create()->count();
    }

    public function getIdByEmail()
    {
        $email = Auth::user()->email;

        return $this->modelFactory->create()->where('email',$email)->first();
    }


}

?>
