// ./src/js/app.js
    
import React from 'react';
import {StrictMode} from 'react';
import {createRoot} from 'react-dom/client';
import '../css/app.css';
import Home from './components/Home';
import { BrowserRouter } from 'react-router-dom';

const rootElement = document.getElementById('root');
const root = createRoot(rootElement);

root.render(<StrictMode><BrowserRouter><Home /></BrowserRouter></StrictMode>,);