<?php
namespace Blog\App;

use function Blog\Db\create_article, Blog\Db\read_article_id , Blog\Db\read_most_recent_articles,
        Blog\Db\create_comment,  Blog\Db\read_articles_userid ,  Blog\Db\read_all_articles ,  Blog\Db\read_all_users
        ,Blog\Db\read_comment_id   ,Blog\Db\search_articles, Blog\Db\search_articles_category;


function add_article($pdo, $article) {
	$new_id = create_article($pdo, $article);
        return $new_id;
}

function get_article($pdo, $id) {
	return ['article' => read_article_id($pdo, $id)];
}

function get_most_recent_articles($pdo) {
	return ['articles' => read_most_recent_articles($pdo)];
}


function add_comment($pdo, $comment) {
	$new_id = create_comment($pdo,$comment);
	return $new_id;
}


function get_articles_userid($pdo,$user_id) {
	return ['articles' => read_articles_userid($pdo, $user_id)];
}

function get_comment_id($pdo,$comment_id) {
	return ['comment' => read_comment_id($pdo, $comment_id)];
}


function get_all_articles($pdo) {
    return ['articles' => read_all_articles($pdo)];
    
}


function get_all_users($pdo) {
    return ['users' => read_all_users($pdo)];
    
}

function get_search_articles($pdo,$name) {
    return ['articles' => search_articles($pdo,$name)];
    
}


function get_articles_category($pdo,$category_id) {
    return ['articles' => search_articles_category($pdo,$category_id)];
    
}
