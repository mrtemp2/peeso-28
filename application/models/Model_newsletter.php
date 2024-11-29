<?php







class Model_newsletter extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function add_subscriber($insert_data)
    {
        return $this->db->insert('subscribers', $insert_data);
    }

    public function sendMessage($data)
    {
        $this->db->insert('newsletters', $data);

        $subscribers = $this->db->select('email')->get('subscribers')->result_array();
        $emails = array_column($subscribers, 'email');       
        return $this->sendEmail($emails, $data);
    }

    public function sendEmail($subscribers, $data)
    {
        $this->load->library('email');

        $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
        $this->email->from('votre@email.com', 'PEESO');
        $this->email->to($subscribers);
        $this->email->subject($data['subject']);
        $this->email->message("
            <html><body style='font-family: Arial, sans-serif;'>
                <div style='border-radius: 5px; background-color: #F9F8FF; width: 70%; margin: auto;'>
                    " . (!empty($data['image']) ? "<img style='width: 100%; border-radius: 5px;' src='" . $data['image'] . "' alt='image'>" : "") . "
                    <div style='padding: 50px;'>
                        <div style='font-size: 1.5rem; color: black; text-align: center; font-weight: 700;'>" . $data['titre'] . "</div>
                        <div style='line-height: 26px; margin-top: 20px; color: #737477; font-weight: 400;'>" . $data['content'] . "</div>
                        " . ($data['withlink'] ? "
                            <div style='margin-top: 50px;'>
                                <a href='" . $data['lien'] . "' style='font-size: 0.9rem; background-color: #553CDF; color: white; font-weight: 500; padding: 14px 33px; border-radius: 5px; text-decoration: none;'>
                                    Read More
                                </a>
                            </div>" : ""
                        ) . "
                    </div>
                </div>
            </body></html>"
        );

        $mail = $this->email->send();
        return $mail;
    }

    public function fetchSubscribers(){
        return $this->db->select('email,id')->get('subscribers')->result_array();
    }

    public function getSubscriber($id){
        return $this->db->select('email')->where('id',$id)->get('subscribers')->row_array();
    }

    public function removeSubscriber($id){
        return $this->db->delete('subscribers', array('id' => $id));
    }

    public function update_subscriber($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('subscribers', $update_data);
        if($status){
            if ($this->db->affected_rows() > 0) {
                return true; // Return true when the update is successful
            } else {
                $error = $this->db->error(); // Get the database error
                log_message('error', 'Database Error: ' . $error['message']);
                return false; // Return false when there's an error or no rows were affected
            }
        } else {
            // Log the database error
            $error = $this->db->error();
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error
        }
        

    }

    public function fetchNewsletters(){
        return $this->db->select('id,subject, titre, created_at')->get('newsletters')->result_array();
    }

    public function get_newsletter($id){
        return $this->db->select('subject, titre, image, content, withlink, lien, created_at')->where('id',$id)->get('newsletters')->row_array();
    }

}
