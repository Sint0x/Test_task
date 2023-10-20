<?php 
class JsonPlaceholderAPI {
    private $base_url = 'https://jsonplaceholder.typicode.com';

    function get_users() {
        return file_get_contents($this->base_url . '/users');
    }

    function get_posts($user_id) {
        return file_get_contents($this->base_url . '/posts?userId=' . $user_id);
    }

    function get_todos($user_id) {
        return file_get_contents($this->base_url . '/todos?userId=' . $user_id);
    }

    function add_post($user_id, $title, $body) {
        $data = array('userId' => $user_id, 'title' => $title, 'body' => $body);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->base_url . '/posts', false, $context);
    }

    function edit_post($post_id, $title = null, $body = null) {
        $data = array();
        if ($title) {
            $data['title'] = $title;
        }
        if ($body) {
            $data['body'] = $body;
        }
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'PUT',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->base_url . '/posts/' . $post_id, false, $context);
    }

    function delete_post($post_id) {
        $options = array(
            'http' => array(
                'method'  => 'DELETE'
            )
        );
        $context  = stream_context_create($options);
        return file_get_contents($this->base_url . '/posts/' . $post_id, false, $context);
    }
}
?>
