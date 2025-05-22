document.addEventListener("DOMContentLoaded", function () {
    const copyButton = document.querySelector(".cpc-button");
    const copyText = document.querySelector(".cpc-wrapper");

    if (copyButton && copyText) {
        copyButton.addEventListener("click", function () {
            navigator.clipboard.writeText(copyText.textContent).then(function () {
                alert("Content copied!"); // Alert the user that content has been copied

                // copyButton.textContent = "Copied!"; // Change button text to "Copied!"
                // copyButton.style.backgroundColor = "#4CAF50"; // Change button color to green
                // setTimeout(() => {
                //     copyButton.textContent = "Copy Post";
                // }, 2000); // Reset button text after 2 seconds
            }, function (error) {
                console.error("Could not copy text: ", error);
            });
        });
    }
});