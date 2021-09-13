<template>
     <div class="">
        <div class="py-3 px-5 bg-purple-exception-300 text-gray-900 rounded-t-md text-sm border shadow-md border-purple-exception-400">
            <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
                <div class="col-span-6">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="searc">
                        Search
                    </label>
                    <input type="text" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md" placeholder="'message, code, file, line..." />
                </div>
                <div class="col-span-3">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="start_date">
                        Start date
                    </label>
                    <input type="date" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md"/>
                </div>
                <div class="col-span-3">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="end_date">
                        End date'
                    </label>
                    <input type="date" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md"/>
                </div>
            </div>
        </div>

        <div class="w-full mb-8 overflow-hidden rounded-b-lg shadow-md mt-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-purple-exception-800 capitalize border-b bg-purple-exception-300 ">
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    ID &#8595;
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    Error Message &#8593;
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    File
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    Line
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    Solutions
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left">
                                    Thrown at
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                               
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border border-purple-exception-400">
                        <tr class="text-gray-700" v-for="exception in exceptions" :key="exception.id">
                            <td class="px-4 py-3 border">
                                {{ exception.id }}
                            </td>
                            <td class="px-4 py-3 border">
                                <code class="overflow-ellipsis">
                                    {{ exception.message }}
                                </code>
                            </td>
                            <td class="px-4 py-3 border">
                                {{ exception.file }}
                            </td>
                            <td class="px-4 py-3 border text-right">
                                {{ exception.line }}
                            </td>
                            <td class="px-4 py-3 border text-right">
                                {{ exception.solutions_count }}
                            </td>
                            <td class="px-4 py-3 border">
                                {{ exception.solutions_created_at }}
                            </td>
                            <td class="px-4 border">
                                <button class="px-4 py-1 rounded-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-30 align-middle">
                                    See
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="px-4 py-2 bg-purple-exception-200 flex justify-start md:justify-center lg:justify-end">
                    <div class="flex">
                        <button class="px-4 py-1 rounded-l-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-30 align-middle">
                            &#60;
                        </button>
                        <button class="px-4 py-1 text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
                            2
                        </button>
                        <button class="px-4 py-1 rounded-r-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
                            &#62;
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        indexRoute: {
            type: String
        }
    },
    data() {
        return {
            isLoading: false,
            exceptions: [],
            search: '',
            startDate: '',
            endDate: '',
            page: 1,
            lastPage: 1,
            perPage: 15,
            orderBy: 'created_at',
            sort: 'desc',
            from: 1,
            to: 1,
            total: 1
        }       
    },
    methods: {
        getExceptions: function() {
            this.isLoading = true;
            axios.get(this.indexRoute).then(function(response) {
                console.log(response.data.data);
                this.exceptions = response.data.data;
                this.page = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.from = response.data.from;
                this.to = response.data.to;
                this.total = response.data.total;
                this.perPage = response.data.per_page;
                console.log(this.exceptions);
                console.log(546);

            }).catch(function(error) {

            });
        }
    },
    mounted() {
        this.getExceptions();
    }
}
</script>

<style>

</style>