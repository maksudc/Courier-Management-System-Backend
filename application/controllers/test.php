<?php

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create_user() {

        $this->load->model('user_model');
    }

    public function see_spec() {

        $contents = file_get_contents('http://test.sentisol.com/cwc/index.php/android/getTaskHistory?username=cwcuser1&returnType=json');

        $contents = json_decode($contents, true);

        foreach ($contents as $content) {

            foreach ($content as $key => $value) {

                if ($key != 'id') {

                    $data[$key] = $value;
                }
            }
            $data['taskid'] = NULL;

            $this->load->model('test_data');

            if ($this->test_data->insert_data($data)) {

                echo "done";
            } else {
             echo "cant't be done"   ;
            }
        }
    }

}

?>
