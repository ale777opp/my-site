<?php
class UserController extends BaseController
{
    /**
     * "/user/list" Endpoint - Get list of users
     */
    public function listAction()
    {
        $strErrorDesc = '';
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        $arrQueryStringParams = $this->getQueryStringParams();
         
        if (strtoupper($requestMethod) == 'GET') {
            try {
                $userModel = new UserModel();

                $initId=1;
                $initLimit = 10;
                
                /*
                if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
                    $initLimit = $arrQueryStringParams['limit'];
                }

                $arrUsers = $userModel->getUsers($initLimit);
                $responseData = json_encode($arrUsers);
                */
                                
                if (isset($arrQueryStringParams['id']) && !isset($arrQueryStringParams['limit'])) {   // есть id но нет limit
                    $initId = $arrQueryStringParams['id'];
                    $arrUsers = $userModel->getUser($initId);


                } else if (isset($arrQueryStringParams['limit']) && !isset($arrQueryStringParams['id'])) { //есть limit  но нет id
                    $initLimit = $arrQueryStringParams['limit'];
                    $arrUsers = $userModel->getUsers($initLimit);



                } else if (isset($arrQueryStringParams['id']) && isset($arrQueryStringParams['limit'])){  //есть id есть limit
                    $initId = $arrQueryStringParams['id'];
                    $initLimit = $arrQueryStringParams['limit'];
                    $arrUsers = $userModel->getFewUsers($initId,$initLimit);

                }  

                
                $responseData = json_encode($arrUsers);


            } catch (Error $e) {
                $strErrorDesc = $e->getMessage().'Something went wrong! Please contact support.';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        // send output
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}