<?php
class auth implements FilterInterface {

}
    public function before(RequestInterface $request, $arguments = null)
    { // Do something here
        echo('Before!'); }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    { // Do something here echo('After!'); }



        ?>