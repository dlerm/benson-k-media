import Vimeo from './components/Vimeo';
import PhotoViewer from './components/PhotoViewer';
import Modal from './components/Modal';

document.addEventListener('DOMContentLoaded', () => {
  Modal.bind();
  Vimeo.bindModal();
  PhotoViewer.bind();
});