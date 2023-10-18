@extends('layouts.app')

@section('title', 'Schools')

@section('content')
    <h1>Select a school to see its members</h1>

    <!-- Add a dropdown to select a school -->
    <select class="js-states browser-default select2" name="school_id" required id="schoolDropdown">
        <option value="option_select" disabled selected>Select a School</option>
        @foreach ($schools as $school)
            <option value="{{ $school->id }}">{{ $school->SchoolName }}</option>
        @endforeach
    </select>

    <!-- Container to display the links -->
    <div id="linksContainer"></div>

    <script>
        const schoolDropdown = document.getElementById('schoolDropdown');
        const linksContainer = document.getElementById('linksContainer');

        schoolDropdown.addEventListener('change', () => {
            const selectedSchoolId = schoolDropdown.value;

            if (selectedSchoolId) {
                // Make an AJAX request to fetch members for the selected school
                fetch(`{{ route('members.bySchool', ['school' => ':schoolId']) }}`.replace(':schoolId', selectedSchoolId))
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.length > 0) {
                            // If there are members, display their details
                            linksContainer.innerHTML = '';
                            data.forEach((member) => {
                                const memberInfo = document.createElement('div');
                                memberInfo.textContent = `Name: ${member.name}, Email: ${member.email}`;
                                linksContainer.appendChild(memberInfo);
                            });
                        } else {
                            // If there are no members, display a message
                            linksContainer.innerHTML = 'No one is assigned to this school.';
                        }
                    })
                    .catch((error) => {
                        console.error('An error occurred:', error);
                    });
            } else {
                // If no school is selected, clear the links container
                linksContainer.innerHTML = '';
            }
        });
    </script>
</div>
