<template>
     <div class="">
        <div class="py-3 px-5 bg-purple-exception-300 text-gray-900 rounded-t-md text-sm border shadow-md border-purple-exception-400">
            <div class="grid grid-cols-6 md:grid-cols-12 gap-2">
                <div class="col-span-6">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="search">
                        Search
                    </label>
                    <input type="text" v-model="search" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md" placeholder="message, code, file, line..." />
                </div>
                <div class="col-span-3">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="start_date">
                        Start date
                    </label>
                    <input type="date" v-model="startDate" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md"/>
                </div>
                <div class="col-span-3">
                    <label class="mr-4 text-purple-exception-800 mb-5" for="end_date">
                        End date
                    </label>
                    <input type="date" v-model="endDate" class="border border-pink-exception-200 bg-gray-100 py-2 px-2 w-full outline-none focus:ring-2 focus:ring-pink-exception-400 rounded-md"/>
                </div>
            </div>
        </div>

        <div class="w-full mb-8 overflow-hidden rounded-b-lg shadow-md mt-4">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-purple-exception-800 capitalize border-b bg-purple-exception-300 ">
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('id')">
                                    ID 
                                    <span v-if="orderBy == 'id'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('message')">
                                    Error Message 
                                    <span v-if="orderBy == 'message'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('file')">
                                    File
                                    <span v-if="orderBy == 'file'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('line')">
                                    Line
                                    <span v-if="orderBy == 'line'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('solutions_count')">
                                    Solutions
                                    <span v-if="orderBy == 'solutions_count'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                                <button class="px-4 py-2 w-full h-full text-left whitespace-nowrap" @click="order('created_at')">
                                    Thrown first time at
                                    <span v-if="orderBy == 'created_at'">
                                        <span v-if="sort == 'desc'">
                                            &#8593;
                                        </span>
                                        <span v-if="sort == 'asc'">
                                            &#8595;
                                        </span>
                                    </span>
                                </button>
                            </th>
                            <th class="border border-purple-exception-400">
                               
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white border border-purple-exception-400" v-if="exceptions.length">
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
                                {{ exception.created_at }}
                            </td>
                            <td class="px-4 border">
                                <div class="h-full w-full flex justify-center content-center">
                                    <a :href="indexRoute + '/' + exception.id" class="px-4 py-1 rounded-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-30 align-middle">
                                        See
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="bg-purple-exception-400 border border-purple-exception-400" v-else>
                        <tr class="">
                            <td colspan="7">
                                <div class="flex justify-center py-10 text-lg text-purple-900">
                                    No Exceptions Found
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="px-4 py-4 bg-purple-exception-200 flex justify-start md:justify-center lg:justify-end">
                    <div class="flex">
                        <button v-if="page != 1" @click="page--" class="px-4 py-1 rounded-l-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-30 align-middle">
                            &#60;
                        </button>
                        <button v-for="p in pages" @click="page = p" :key="p" :class="{'text-white': page == p, 'text-purple-exception-700': page != p, 'bg-purple-exception-700': page == p, 'rounded-r-md': page == lastPage && p == lastPage, 'rounded-l-md': p == 1 && page == 1}" class="px-4 py-1 text-sm font-medium border focus:outline-none focus:ring transition border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
                            {{ p }}
                        </button>
                        <button v-if="page != lastPage" @click="page++" class="px-4 py-1 rounded-r-md text-sm font-medium border focus:outline-none focus:ring transition text-purple-exception-700 border-purple-exception-700 hover:text-white hover:bg-purple-exception-700 active:bg-purple-exception-800 focus:ring-pink-exception-300 align-middle">
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
    computed: {
        pages: function() {
            let first = (this.page - 3 >= 1) ? this.page - 3 : 1;
            let last = (this.page + 3 <= this.lastPage) ? this.page + 3 : this.lastPage;

            return Array.from({length: last - first + 1}, (_, i) => i + first);
            
        }
    },
    methods: {
        getExceptions: async function() {
            this.isLoading = true;

            try
            {
                let response = await axios.get(this.indexRoute, {
                    params: {
                        page: this.page,
                        order_by: this.orderBy,
                        sort: this.sort,
                        perPage: this.perPage,
                        filters: {
                            search: this.search,
                            start_date: this.startDate,
                            end_date: this.endDate
                        }
                    },
                    paramsSerializer: params => { return qs.stringify(params) }
                });
                this.isLoading = true;
                this.exceptions = response.data.data;
                this.page = response.data.current_page;
                this.lastPage = response.data.last_page;
                this.from = response.data.from;
                this.to = response.data.to;
                this.total = response.data.total;
                this.perPage = response.data.per_page;
            }
            catch(error) 
            {
                console.log(error);
            }
            finally 
            {
                this.isLoading = false;
            }
        },
        order: function(attribute) {
            if(this.orderBy == attribute)
            {
               this.sort = this.sort == 'desc' ? 'asc' : 'desc';
            }
            else
            {
                this.sort = 'desc';
            }
            this.orderBy = attribute;
        }
    },
    watch: {
        page: function() {
            this.getExceptions();
        },
        search: _.debounce(function() {
            this.getExceptions();
        }, 300),
        startDate: function() {
            this.getExceptions();
        },
        endDate: function() {
            this.getExceptions();
        },
        sort: function() {
            this.getExceptions();
        },
        orderBy: function() {
            this.getExceptions();
        },
    },
    mounted() {
        this.getExceptions();
    }
}
</script>

<style>

</style>