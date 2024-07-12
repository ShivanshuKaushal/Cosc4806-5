<?php

class Reminder extends Controller {

  public function index(){
     $reminder = $this->model('Reminder');
     $list_reminders = $reminder->getAll_reminders();
     $this->view('reminders/index', ["reminders" => $list_reminders]);
   }

   public function create(){
     $this->view('reminders/create');
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $_SESSION['subject'] = $_POST['subject'];
         $reminder = $this->model('Reminder');
         $reminder->create_reminder($_SESSION['userid'], $_SESSION['subject']);
         unset($_SESSION['subject']);
         header('Location: /reminders');
     } else {
         $this->view('reminders/create');
     }
   public function update($id) {
       $reminder = $this->model('Reminder');
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           $_SESSION['subject'] = $_POST['subject'];
           $reminder->update_reminder($id, $_SESSION['subject']);
           unset($_SESSION['subject']);
           header('Location: /reminders');
       } else {
           $reminder_data = $reminder->get_reminder($id);
           $this->view('reminders/update', ['reminder' => $reminder_data]);
       }
    

   public function delete_reminder($id) {
       $db = db_connect();
       $statement = $db->prepare("DELETE FROM reminders WHERE id = :id");
       $statement->bindParam(':id', $id, PDO::PARAM_INT);
       $statement->execute();
   }
     public function delete($id) {
         $reminder = $this->model('Reminder');
         $reminder->delete_reminder($id);
         header('Location: /reminders');
     }
   }
?>
     
  

