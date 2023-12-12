<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
        Community's Listings
    </h1>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8" id="app">

</div>
{{-- <img src="${item.image}" alt="${item.name}" width="200" height="200"> --}}
<script>
    fetch('https://ecoswapx.test/api/items')
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const newItemDiv = document.createElement('div');
                newItemDiv.innerHTML = `
                    <img src="http://www.fillster.com/images/pictures/10p.jpg" alt="dog" width="200" height="200">
                    <div class="flex items-center">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">
                            ${item.name}
                        </h2>
                    </div>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        ${item.description}
                    </p>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        Condition: <button type="button" style="width: 150px;" class="ms-3 text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">${item.condition}</button>
                    </p>
                    <p class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                        Swap for: <button type="button" style="width: 150px;" class="ms-4 text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">${item.swap_for_item}</button>
                    </p>
                `;
                document.getElementById('app').appendChild(newItemDiv);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
</script>
