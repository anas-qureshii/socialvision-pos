//  window.addEventListener('load', () => {
    console.log("working")
        if (document.getElementById('add_items')) {
            let addItem = document.getElementById('add_items');
            let popParent = document.getElementById('items_pop');
            let closeBtns = document.querySelectorAll('.close-btn');
            // let pop = document.getElementById('items_pop');
            addItem.addEventListener('click', async () => {
                // try {
                //     const response = await fetch('http://127.0.0.1:8000/api/product/search/metal', {
                //         method: 'POST',
                //         header: {
                //             'Content-Type': 'application/json'
                //         },
                //         body: JSON.stringify({
                //             'limit': 10,
                //             'offset': 0
                //         })
                //     });

                //     // Check if the response is O   K
                //     if (!response.ok) {
                //         throw new Error(`HTTP error! status: ${response.status}`);
                //     }

                //     const result = await response.json(); // Proper way to get the response data
                //     console.log(result); // Use the data here

                //     // Example: maybe show items in a popup
                //     // document.getElementById('items_pop').innerHTML = JSON.stringify(result);

                // } catch (error) {
                //     console.error('Failed to fetch items:', error);
                // }
                popParent.classList.remove('hidden');
            })

            Array.from(closeBtns).forEach(element => {
                element.addEventListener('click',function(){
                    let parent = document.getElementById(`${this.getAttribute('parent-id')}`);
                    parent.classList.add('hidden');

                })
            });

            // popParent.addEventListener('click', (e) => {
            //     e.preventDefault();
            //     e.stopImediatePr
            //     popParent.classList.add('hidden')
            // })
        }
    // });