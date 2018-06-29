import React, { Component } from 'react';
import ReactDOM from 'react-dom';
// import Card from './Card';
// import Button from './Button';
import Post from './Post';

class Main extends Component {
    constructor() {
        super();
        this.state = {
            posts: [],
            currentPost: null
        }
    }

    componentDidMount() {
        fetch('api/_posts')
            .then(res => {
                return res.json();
            })
            .then(posts => {
                this.setState({ posts });
            });
    }
    handleClick(post) {
      this.setState({currentPost:post});
    }

    renderPosts() {
        return this.state.posts.map(post => {
            return (
                <li
                  onClick={() => this.handleClick(post)}
                  key={post.id} >
                    {post.title}
                </li>
            );
        });
    }

    render() {
         return(
                <div className="mainDivStyle">
                  <div className="divStyle">
                    <h1>WatchBlog</h1>
                    <ul>
                        {this.renderPosts()}
                    </ul>
                  </div>

                  <Post post={this.state.currentPost} />

                </div>
         );
    }

}
export default Main;

/* The if statement is required so as to Render the component on pages that have a div with an ID of "root";
*/

if (document.getElementById('root')) {
    ReactDOM.render(<Main />, document.getElementById('root'));
}
