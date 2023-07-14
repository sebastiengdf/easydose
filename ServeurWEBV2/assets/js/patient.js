// ./src/js/patient.js

import React from 'react';
import {StrictMode} from 'react';
import {createRoot} from 'react-dom/client';
import '../css/patient.css';
import PatientHome from './components/Patient/PatientHome';
import { BrowserRouter } from 'react-router-dom';
// start the Stimulus application
//import '../styles/global.scss';
//import 'bootstrap';

const rootElement = document.getElementById('patient');
const root = createRoot(rootElement);

root.render(<StrictMode><BrowserRouter><PatientHome /></BrowserRouter></StrictMode>,);