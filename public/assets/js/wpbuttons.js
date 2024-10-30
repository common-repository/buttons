'use strict';

class WPButtons {
  constructor(buttonElement) {
    this.button = buttonElement;
    this.run();
  }

  run() {
    this.shareServices();
    this.actionServices();
  }

  shareServices() {
    const links = this.button.querySelectorAll('[data-wpbutton-share]');
    links.forEach(link => {
      link.addEventListener('click', (event) => {
        event.preventDefault();
        this.shareThis(link);
      });
    });
  }

  shareThis(link) {
    const service = link.getAttribute('data-wpbutton-share');
    const shareData = this.defaultShareServices();
    const shareService = shareData[service];
    const winWidth = 550;
    const winHeight = 450;
    const topPosition = (screen.height - winHeight) / 2;
    const leftPosition = (screen.width - winWidth) / 2;

    const winParams = `menubar=no, toolbar=no, location=no, scrollbars=no, status=no, resizable=yes, 
                        width=${winWidth}, height=${winHeight}, top=${topPosition}, left=${leftPosition}`;
    window.open(shareService.url, null, winParams);
  }

  defaultShareServices() {
    const PAGE_URL = encodeURIComponent(document.location.href);
    const PAGE_TITLE = encodeURIComponent(document.title);

    return {
      'facebook': {
        url: `https://www.facebook.com/sharer.php?u=${PAGE_URL}`,
      },
      'linkedin': {
        url: `https://www.linkedin.com/shareArticle?mini=true&url=${PAGE_URL}&title=${PAGE_TITLE}`,
      },
      'stumbleupon': {
        url: 'http://www.stumbleupon.com/submit?url=${PAGE_URL}&title=${PAGE_TITLE}',
      },
      'pinterest': {
        url: `http://pinterest.com/pin/create/button/?url=${PAGE_URL}`,
      },
      'email': {
        url: `mailto:?subject=${PAGE_TITLE}&body=${PAGE_URL}`,
      },
      'buffer': {
        url: `https://buffer.com/add?text=${PAGE_TITLE}&url=${PAGE_URL}`,
      },
      'whatsapp': {
        url: `whatsapp://send?text=${PAGE_TITLE}%20%0A${PAGE_URL}`,
      },
      'twitter': {
        url: `https://twitter.com/intent/tweet?url=${PAGE_URL}&text=${PAGE_TITLE}`,
      },
      'reddit': {
        url: `http://www.reddit.com/submit?url=${PAGE_URL}&title=${PAGE_TITLE}`,
      },
    };
  }

  actionServices() {
    const links = this.button.querySelectorAll('[data-wpbutton-action]');
    links.forEach(link => {
      link.addEventListener('click', (event) => {
        event.preventDefault();
        const action = link.getAttribute('data-wpbutton-action');
        this.handleAction(action, link);
      });
    });

  }

  handleAction(action, link) {
    const actionMap = {
      print: () => window.print(),
    };

    const actionFunction = actionMap[action];
    if (actionFunction) {
      actionFunction();
    }
  }

}

document.addEventListener('DOMContentLoaded', function() {
  const buttons = document.querySelectorAll('.wpie-btn__wrap');
  const buttonHandlers = Array.from(buttons).map(button => new WPButtons(button));
});
