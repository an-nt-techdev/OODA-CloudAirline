function TwoWay()
{
    if (document.getElementById("one-way").checked)
    {
        document.getElementById("returning").disabled = true;
        document.getElementById("returning").value = "";
    }
    else if (document.getElementById("two-way").checked)
    {
        document.getElementById("returning").disabled = false;
    }    
}