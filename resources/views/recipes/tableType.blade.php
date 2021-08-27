<thead>
    <tr>
        <th class="th-lg">
            <div class="td-h">رقم </div>
        </th>
        <th class="th-lg">
            <div class="td-h">الاسم بالفرنسية</div>
        </th>
        <th class="th-lg">
            <div class="td-h">الاسم بالعربي</div>
        </th>

        <th class="th-lg">
        </th>

    </tr>
</thead>
<!--Table head-->
<!--Table body-->
<tbody class=" tbody" id="myTable" v-for="type in types">
    <tr>
        <td>
            <div class="td-p">@{{type.id}}</div>
        </td>
        <td>
            <div>
                <p class="td-p">@{{type.name}}</p>
            </div>
        </td>
        <td class="size">
            <div>
                <p class="td-p">@{{type.name_ar}}</p>
            </div>
        </td>
        <td>
            <button @click.prevent="editType(type)" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-pencil-alt mt-0"></i></button>
            <button @click.prevent="deleteType(type)" type="button"
                class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="far fa-trash-alt mt-0"></i>
            </button>

        </td>
    </tr>
</tbody>
