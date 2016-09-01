<?php
class userlogin
{
    function userlogin()
    {
	
    }
	
	function logintenant($user, $pwd, $tenant)
    {
		$post = "{'FlowAdmin':{'___smart_action___':'lookup', '___smart_value___':'Security'},'identity':'" . $user . "', 'password':'" . $pwd . "', 'type':'custom'}";
        $comm = new smartcomm;
        $json = $comm->postSmart('/' . $tenant . '/Security/Authenticate', $post, '');
        $resp = $json->{'responses'};
        if ($resp != null)
        {
            $sess = $resp[0]->{'sessionId'};
            if ($sess != null)
            {
                return $sess;
            }
        }
        return "Error";
    }
}
?>	
