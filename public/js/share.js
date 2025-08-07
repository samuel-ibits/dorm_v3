
const share = async (title, text) => {
  if (!navigator.canShare) {
    output.textContent = `Your browser doesn't support the Web Share API.`;
    return;
  }
  if (navigator.canShare()) {
    try {
      await navigator.share({ 
        title: title,
        text: text,
      });
      output.textContent = "Shared!";
    } catch (error) {
      output.textContent = `Error: ${error.message}`;
    }
  } else {
    output.textContent = `Your system doesn't support sharing these files.`;
  }
};
