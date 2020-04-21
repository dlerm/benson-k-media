import Player from '@vimeo/player';

let player = false;

const videoModal = document.getElementById('modal-video');

const init = () => {
  document.querySelectorAll('[data-modal-show]').forEach((modalTrigger, index) => {
    console.log('loop', index)
    console.log('Data', modalTrigger.dataset);
    const { video } = modalTrigger.dataset;
    console.log('ID', video);
    if (!player && video) {
      console.log('START VIDEO - ', modalTrigger.dataset.title)
      player = new Player('modal-video', {
        id: video,
      });
    }
    modalTrigger.addEventListener('click', (event) => {
      console.log('click');
      player.loadVideo(video);//.then(player.play);
    })
  })  
}

export default init;