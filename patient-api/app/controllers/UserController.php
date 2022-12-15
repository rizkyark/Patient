<?php
declare(strict_types=1);

use Phalcon\Http\Request;
use Phalcon\Http\Response;

class UserController extends \Phalcon\Mvc\Controller
{

    public function getAllUserAction()
    {
        $this->view->disable();
        $response = new Response();
        $user = User::find();

        $result = [
            'code' => 200,
            'response' => 'Success',
            'msg' => 'Success get data!',
            'data' => $user
        ];

        return $response->setJsonContent($result);
    }

    public function getUserByIdAction($id)
    {
        $this->view->disable();
        $response = new Response();
        $user = User::findFirst([
            'conditions' => 'user_id = :id:',
            'bind' => [
                'id' => $id
            ]
        ]);

        if($user !== NULL) {
            // echo 'OK!';
            $result = [
                'code' => 200,
                'response' => 'Success',
                'msg' => 'Success show user with id '.$id,
                'data' => $user
            ];

            $response->setStatusCode(200,'Success');
            return $response->setJsonContent($result);
        } else {
            $result = [
                'code' => 400,
                'response' => 'Failed',
                'msg' => 'Cant find user with id '.$id,
                'data' => null
            ];

            $response->setStatusCode(400,'Not Found');
            return $response->setJsonContent($result);
        }
    }

    public function createUserAction()
    {
        $this->view->disable();

        $request = $this->request->getJsonRawBody();
        
        $user = new User;
        $user->user_name = $request->name;
        $user->user_sex = $request->sex;
        $user->user_religion = $request->religion;
        $user->user_phone = $request->phone;
        $user->user_address = $request->address;
        $user->user_nik = $request->nik;
        $user->save();
        
        $response = new Response();
        $result = [
            'code' => 200,
            'response' => 'Success',
            'msg' => 'Success Create User!',
            'data' => $user
        ];

        return $response->setJsonContent($result);
    }

    public function updateUserAction($id)
    {
        $this->view->disable();

        $request = $this->request->getJsonRawBody();
        $response = new Response();

        $user = User::findFirst([
            'conditions' => 'user_id = :id:',
            'bind' => [
                'id' => $id
            ]
        ]);

        if($user !==NULL){
            $user->user_name = $request->user_name;
            $user->user_sex = $request->user_sex;
            $user->user_religion = $request->user_religion;
            $user->user_phone = $request->user_phone;
            $user->user_address = $request->user_address;
            $user->user_nik = $request->user_nik;
            $user->save();

            $result = [
                'code' => 200,
                'response' => 'Success',
                'msg' => 'Success update user data with id: '.$id,
                'data' => $user
            ];

            return $response->setJsonContent($result);
        } else {
            $result = [
                'code' => 400,
                'response' => 'Failed',
                'msg' => 'Failed update user data with id: '.$id,
            ];

            $response->setStatusCode(400, 'Not Found');
            return $response->setJsonContent($result);
        }
    }

    public function deleteUserAction($id)
    {
        $this->view->disable();

        $response = new Response();

        $user = User::findFirst([
            'conditions' => 'user_id = :id:',
            'bind' => [
                'id' => $id
            ]
        ]);

        if($user !==NULL){
            $user->delete();

            $result = [
                'code' => 200,
                'response' => 'Success',
                'msg' => 'Success delete user data with id: '.$id,
                'data' => $user
            ];

            return $response->setJsonContent($result);
        } else {
            $result = [
                'code' => 400,
                'response' => 'Failed',
                'msg' => 'Failed delete user data with id: '.$id,
            ];

            $response->setStatusCode(400, 'Not Found');
            return $response->setJsonContent($result);
        }
    }
}

