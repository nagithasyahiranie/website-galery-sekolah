import React from 'react';
import ReactDOM from 'react-dom';

const App = () => <div>Testing React App</div>;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
