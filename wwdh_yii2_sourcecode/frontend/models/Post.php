<?php
    namespace frontend\models;
    
    use yii\db\ActiveRecord;
    
    class Post extends ActiveRecord{
        private $post_id;
        private $title;
        private $introduction;
        private $description;
        private $user_id;
        private $date;
        private $attendence;
        
        public function rules(){
            return [
                [['title', 'introduction', 'description'], 'required'],
                [['post_id', 'user_id'], 'integer'],
                [['title'], 'string', 'max'=>30],
                [['introduction'], 'string', 'max'=>200],
                [['date'], 'date'],
            ];
        }
        
        
    }
?>
