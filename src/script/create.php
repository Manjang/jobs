<?php

$data = json_decode(file_get_contents('php://input'), TRUE);

if (isset($data['job'])) {

    require __DIR__ . '/library.php';

    $job_title = (isset($data['job']['job_title']) ? $data['job']['job_title'] : NULL);
    $job_level = (isset($data['job']['job_level']) ? $data['job']['job_level'] : NULL);
    $specialization = (isset($data['job']['specialization']) ? $data['job']['specialization'] : NULL);
    $job_type = (isset($data['job']['job_type']) ? $data['job']['job_type'] : NULL);
    $min_qualification = (isset($data['job']['min_qualification']) ? $data['job']['min_qualification'] : NULL);
    $experience = (isset($data['job']['experience']) ? $data['job']['experience'] : NULL);
    $application_deadline = (isset($data['job']['application_deadline']) ? $data['job']['application_deadline'] : NULL);
    $salary = (isset($data['job']['salary']) ? $data['job']['salary'] : NULL);
    $job_location = (isset($data['job']['job_location']) ? $data['job']['job_location'] : NULL);
    $job_headline = (isset($data['job']['job_headline']) ? $data['job']['job_headline'] : NULL);
    $job_description = (isset($data['job']['job_description']) ? $data['job']['job_description'] : NULL);

    // validated the request
    if ($job_title == NULL) {
        http_response_code(400);
        echo json_encode(['errors' => ["Job Title Field is required"]]);

    } else {

        // Add the Job
        $job = new Job();

        echo $job->Create($job_title, $job_level, $specialization, $job_type, $min_qualification, $experience, $application_deadline, $salary, $job_location, $job_headline, $job_description);
    }
}
?>