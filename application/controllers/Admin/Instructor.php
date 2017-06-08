<?
if(!defined('BASEPATH'))exit('No direct script access allowed');
   class Instructor extends Kodakil_Controller
   {
      function __construct(){
         parent::__construct();
         $this->checkLogin();
         $this->load->model('Admin/Instructor_model');
      }

      public function index(){
         $header_data            = new StdClass;
         $data                   = new StdClass;
         $header_data->mainMenu  = 'Instructor';
         $header_data->subMenu   = 'InstructorList';
         $data->instructors      = $this->Instructor_model->getInstructors();
         $this->load->view('Admin/header',$header_data);
         $this->load->view('Admin/instructor_list',$data);
         $this->load->view('Admin/footer');
      }

      public function add(){
         $header_data            = new StdClass;
         $data                   = new StdClass;
         $header_data->mainMenu  = 'Instructor';
         $header_data->subMenu   = 'InstructorAdd';
         if ($this->input->post()) {
            $name_surname     = $this->input->post('name_surname',true);
            $title            = $this->input->post('title',true);
            $bio              = $this->input->post('bio',true);
            $phone            = $this->input->post('phone',true);
            $email            = $this->input->post('email',true);
            $facebook         = $this->input->post('facebook',true);
            $twitter          = $this->input->post('twitter',true);
            $google           = $this->input->post('google',true);
            $linkedin         = $this->input->post('linkedin',true);
            $picture          = $this->session->flashdata('picture');
            $instructorInfo   = array('name_surname'  => $name_surname,
                                      'title'         => $title,
                                      'bio'           => $bio,
                                      'phone'         => $phone,
                                      'email'         => $email,
                                      'facebook'      => $facebook,
                                      'twitter'       => $twitter,
                                      'google'        => $google,
                                      'linkedin'      => $linkedin,
                                      'picture'       => $picture);
            if ($this->Instructor_model->addInstructor($instructorInfo)) {
               $this->session->set_flashdata('onay','1');
               redirect(admin_url('Instructor/add'));
            }else{
               $this->session->set_flashdata('hata','1');
               redirect(admin_url('Instructor/add'));
            }
         }
         $this->load->view('Admin/header',$header_data);
         $this->load->view('Admin/instructor_add',$data);
         $this->load->view('Admin/footer');
      }

      public function ImageUpload(){   
      $sonuc = $this->Instructor_model->ImageUpload();
         if ($sonuc != false){
            $this->session->set_flashdata('picture', $sonuc);
         }
      }

      public function instructorStatusUpdate($id,$newInfo){
         if($this->Instructor_model->instructorStatusUpdate($id,$newInfo)){
            redirect(admin_url('Instructor'));
         }else{
            redirect(admin_url('Instructor'));
         }
      }
      public function deleteInstructor($id){
         if($this->Instructor_model->instructorDelete($id)){
            redirect(admin_url('Instructor'));
         }else{
            redirect(admin_url('Instructor'));
         }
      }

      public function updateInstructor($id){
         $header_data            = new StdClass;
         $data                   = new StdClass;
         $header_data->mainMenu  = 'Instructor';
         $header_data->subMenu   = 'InstructorList';
         $data->cacheInfo        = $this->Instructor_model->cacheInfo($id);
         if ($this->input->post()) {
            if (empty($this->session->flashdata('picture'))) {
               $name_surname     = $this->input->post('name_surname',true);
               $title            = $this->input->post('title',true);
               $bio              = $this->input->post('bio',true);
               $phone            = $this->input->post('phone',true);
               $email            = $this->input->post('email',true);
               $facebook         = $this->input->post('facebook',true);
               $twitter          = $this->input->post('twitter',true);
               $google           = $this->input->post('google',true);
               $linkedin         = $this->input->post('linkedin',true);
               $picture          = $data->cacheInfo->picture;
               $instructorInfo   = array('name_surname'  => $name_surname,
                                         'title'         => $title,
                                         'bio'           => $bio,
                                         'phone'         => $phone,
                                         'email'         => $email,
                                         'facebook'      => $facebook,
                                         'twitter'       => $twitter,
                                         'google'        => $google,
                                         'linkedin'      => $linkedin,
                                         'picture'       => $picture);
               if ($this->Instructor_model->updateInstructor($instructorInfo,$id)) {
                  $this->session->set_flashdata('onay','1');
                  redirect(admin_url('Instructor/updateInstructor/'.$id));
               }else{
                  $this->session->set_flashdata('hata','1');
                  redirect(admin_url('Instructor/updateInstructor/'.$id));
               }
            }else{
               $name_surname     = $this->input->post('name_surname',true);
               $title            = $this->input->post('title',true);
               $bio              = $this->input->post('bio',true);
               $phone            = $this->input->post('phone',true);
               $email            = $this->input->post('email',true);
               $facebook         = $this->input->post('facebook',true);
               $twitter          = $this->input->post('twitter',true);
               $google           = $this->input->post('google',true);
               $linkedin         = $this->input->post('linkedin',true);
               $picture          = $this->session->flashdata('picture');
               $instructorInfo   = array('name_surname'  => $name_surname,
                                         'title'         => $title,
                                         'bio'           => $bio,
                                         'phone'         => $phone,
                                         'email'         => $email,
                                         'facebook'      => $facebook,
                                         'twitter'       => $twitter,
                                         'google'        => $google,
                                         'linkedin'      => $linkedin,
                                         'picture'       => $picture);
               if ($this->Instructor_model->updateInstructor($instructorInfo,$id)) {
                  $this->session->set_flashdata('onay','1');
                  redirect(admin_url('Instructor/updateInstructor/'.$id));
               }else{
                  $this->session->set_flashdata('hata','1');
                  redirect(admin_url('Instructor/updateInstructor/'.$id));
               }
            }
         }
         $data->instructorsInfo  = $this->Instructor_model->getInstructorsInfo($id);
         $this->load->view('Admin/header',$header_data);
         $this->load->view('Admin/instructor_edit',$data);
         $this->load->view('Admin/footer');
      }
      
   }
?>