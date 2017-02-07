<?php 
    if(isset($_POST['btn'])) {
        require_once './dompdf/dompdf_config.inc.php';
        $obj_dom=new DOMPDF();
        //$given_text=$_POST['given_text'];
//        $given_text = file_get_contents('hello.php');
        $give_text="
            <table border='1' width='800' align='center'>
                <tr>
                    <td>First Name</td>
                    <td>First Name</td>
                    <td>First Name</td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>First Name</td>
                    <td>First Name</td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>First Name</td>
                    <td>First Name</td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td>First Name</td>
                    <td>First Name</td>
                </tr>
            </table>
            ";
        
        $obj_dom->load_html($give_text);
        $obj_dom->render();
        $obj_dom->stream('test.pdf');
        
        
    }

?>






<form action="" method="post">
    <table>
        <tr>
            <td>Enter Text</td>
            <td><textarea name="given_text" rows="8" cols="40"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn" value="SubMiT"></td>
        </tr>
    </table>
</form>