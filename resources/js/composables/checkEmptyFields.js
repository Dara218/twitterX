export default function checkEmptyFields(name, email, months, days, years, emptyFields)
{
    if(name !== '' && email !== '' && months.length > 0 && days.length > 0 && years.length > 0)
    {
        emptyFields = false
    }
    return emptyFields
}
