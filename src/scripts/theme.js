import MobileMenu from './components/MobileMenu';
import Scroll from './components/Scroll';
import Vimeo from './components/Vimeo';
import PhotoViewer from './components/PhotoViewer';
import Modal from './components/Modal';

document.addEventListener('DOMContentLoaded', () => {
  MobileMenu.bind();
  Modal.bind();
  Vimeo.bindModal();
  PhotoViewer.bind();
  Scroll.bind();
});
