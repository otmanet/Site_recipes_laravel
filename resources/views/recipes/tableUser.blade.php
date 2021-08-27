<thead>
    <tr>
        <th class="th-lg">
            <div class="td-h">رقم المستعمل</div>
        </th>
        <th class="th-lg">
            <div class="td-h">اسم المستعمل</div>
        </th>
        <th class="th-lg">
            <div class="td-h">البريد الالكتروني للمستخدم</div>
        </th>
        <th>
            <div class="td-h">أنشئت في</div>
        </th>
        <th class="th-lg">
        </th>

    </tr>
</thead>
<!--Table head-->
<!--Table body-->
<tbody class=" tbody" id="myTable" v-for="user in users">
    <tr>
        <td>
            <div class="td-p">@{{user.id}}</div>
        </td>
        <td>
            <div>
                <p class="td-p">@{{user.name}}</p>
            </div>
        </td>
        <td class="size">
            <div>
                <p class="td-p">@{{user.email}}</p>
            </div>
        </td>
        <td>
            <div>
                <p class="td-p">@{{user.created_at}}</p>
            </div>
        </td>

        <td>
            <button @click.prevent="EditUser(user)" type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="fas fa-pencil-alt mt-0"></i></button>
            <button @click.prevent="deleteUser(user)" type="button"
                class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="far fa-trash-alt mt-0"></i>
            </button>

        </td>
    </tr>
</tbody>
