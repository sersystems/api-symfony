import React, { Component } from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Login from "./components/login";
import './scss/index.scss';

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Login />
            </BrowserRouter>
        );
    }
}

ReactDom.render(<App />, document.getElementById('root'));