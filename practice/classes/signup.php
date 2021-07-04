<?php

class Signup
{
    private $error = "";
    public function evaluate($data)
    {
        foreach($data as $key => $value)
        {
            if(empty($value))
            {
                $this->error = $this->error . $key . " is empty!<br>";
            }
            //check if email
            if($key == "email")
            {
                if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value))
                {
                    $this->error = $this->error . "Invalid Email<br>";
                }
                
            }

            //check first name
            if($key == "first_name")
            {
                if(is_numeric($value))
                {
                    $this->error = $this->error . "First name cannot be number.<br>";
                }
                if(strstr($value," "))
                {
                    $this->error = $this->error . "First name cannot have spaces.<br>";
                }
                
            }
            //check lastname
            if($key == "last_name")
            {
                if(is_numeric($value))
                {
                    $this->error = $this->error . "Last name cannot be number.<br>";
                }
                if(strstr($value," "))
                {
                    $this->error = $this->error . "Last name cannot have spaces.<br>";
                }
                
            }
        }
        //creating user
        if($this->error == "")
        {
            //no error
            $this->create_user($data);
        }
        else
        {
            return $this->error;
        }
    }

    private function create_userid()
    {
        $length = rand(4,19);
        $number="";
        for($i=0; $i< $length;$i++)
        {
            $new_rand= rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }

    public function create_user($data)
    {
        $first_name = ucfirst($data['first_name']);
        $last_name = ucfirst($data['last_name']);
        $email = $data['email'];
        $department = $data['department'];
        $program = $data['program'];
        $batch = $data['batch'];
        $password = $data['password'];


        //create this


        $url_address = strtolower($first_name) . "." . strtolower($last_name);
        $userid = $this->create_userid();
        $query = "insert into users(userid,first_name,last_name,email,department,program,batch,password,url_address)
         values('$userid','$first_name','$last_name','$email','$department','$program','$batch','$password','$url_address')";
        
        $DB = new Database();
        $DB->save($query);

    }
    
}