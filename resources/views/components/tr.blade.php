@props([
    'label', 'value'
])
<tr class="overflow-x-scroll whitespace-nowrap">
    <td class="font-medium" >
        <span>{{ $label }}</span>
    </td>
    <td class="px-1 md:px-3" >:</td>
    <td>
        <p>{{ $value }}</p>
    </td>
</tr>
