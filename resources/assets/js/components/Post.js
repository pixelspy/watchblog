import React, { Component } from 'react';

/* Stateless component or pure component
 * { post } syntax is the object destructing
 */
const Post = ({post}) => {

  //if the props post is null, return post doesn't exist
  if(!post) {
    return( <div className="divStyle">  Post Doesn't exist </div> );
  }

  //Else, display the post data
  return(
    <div className="divStyle">
      <h2> {post.title} </h2>
      <p> {post.body} </p>
      <small>Written on {post.created_at}</small> by <a href="#">{post.user_id}</a>
      <br/>
      <a href="#"><small>Category: {post.category_id}</small></a>
    </div>
  )
}

export default Post ;
