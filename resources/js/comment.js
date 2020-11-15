"use strict";
window.onload = function () {
        document.getElementById('send').onclick = function () {
            const name = document.getElementById("name").value;
            const comment = document.getElementById("comment").value;
            const news_id = document.getElementById("news_id").value;
            (async () => {
                const response = await fetch('/news/new_comment', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }),
                    body: JSON.stringify({
                        name: name,
                        comment: comment,
                        news_id: news_id,
                    }),
                });
                const answer = await response.json();
                if (answer === 'ok') {
                    document.getElementById('comment_block').insertAdjacentHTML('afterbegin', `<p><strong>${name} </strong>${comment}</p>`);
                    document.getElementById("comment_form").reset();
                } else {
                    console.log('error');
                }
            })();
        }
    }
