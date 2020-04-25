import Player from '@vimeo/player';

export let player = false;
let activeVideo = false;

const bindModal = () => {
  const videoModal = document.getElementById('modal-video');
  document.querySelectorAll('[data-video][data-modal-open]').forEach((modalTrigger, index) => {
    const { video = false } = modalTrigger.dataset;
    if (!player && video) {
      player = new Player('modal-video', {
        id: video,
        width: 1024,
      });
      activeVideo = video;
    }
    modalTrigger.addEventListener('click', (event) => {
      if (activeVideo !== video) player.loadVideo(video).then(player.play);
      else player.play();
    })
  })

  // document.querySelectorAll('[data-modal="video-player"] [data-modal-close]').forEach((modalTrigger, index) => {
  //   modalTrigger.addEventListener('click', (event) => {
  //     if (!player) return;
  //     player.pause();
  //     player.setCurrentTime(0);
  //   })
  // });
}

export const playerReset = (vimeoPlayer) => {
  vimeoPlayer.pause();
  vimeoPlayer.setCurrentTime(0);
};

export default {
  bindModal,
};