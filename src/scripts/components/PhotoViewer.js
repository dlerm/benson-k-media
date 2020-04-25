// https://developer.wordpress.com/docs/photon/
const sizedImage = (url, width = false, height = false, scale = false) => {
  if (!width && !height && !scale) return url;
  let sizedImageUrl = url.split('?')[0];
  sizedImageUrl += '?';
  if (width) sizedImageUrl += `w=${width}`;
  if (height) sizedImageUrl += `h=${height}`;
  if (scale) sizedImageUrl += `zoom=${scale}`;
  return sizedImageUrl
};

const srcset = (url, width) => {
  return `${sizedImage(url, width)}, ${sizedImage(url, width, 2)} 2x`;
};

const photoModal = document.getElementById('modal-photo');

const bind = () => {
  document.querySelectorAll('[data-photo][data-modal-open]').forEach((modalTrigger) => {
    modalTrigger.addEventListener('click', () => {
      const { photo = false } = modalTrigger.dataset;
      if (!photo) return;
      const sourceMap = [
        { media: '0px', srcset: srcset(photo, 320) },
        { media: '321px', srcset: srcset(photo, 375) },
        { media: '376px', srcset: srcset(photo, 420) },
        { media: '421px', srcset: srcset(photo, 480) },
        { media: '481px', srcset: srcset(photo, 640) },
        { media: '641px', srcset: srcset(photo, 768) },
        { media: '769px', srcset: srcset(photo, 992) },
        { media: '993px', srcset: srcset(photo, 1200) },
      ];

      const sourceElements = sourceMap.map((source) => {
        return `<source media="${source.media}" srcset="${source.srcset} />`;
      });

      photoModal.innerHTML = sourceElements.join('');
      photoModal.innerHTML += `<img src="${sizedImage(photo, 1200)}" srcset="${sizedImage(photo, 1200, false, 2)}" alt="Zoomed Image">`;
    });
  });
};

export default {
  bind,
}