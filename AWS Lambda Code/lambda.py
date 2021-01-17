import json
import boto3

def lambda_handler(event, context):
    # TODO implement
    rekognition = boto3.client('rekognition')
    s3 = boto3.client('s3')

    imageName = event['Records'][0]['s3']['object']['key']
    print(imageName)

    image = s3.get_object(Bucket = 'Source_Bucket',Key = imageName)

    response = rekognition.detect_moderation_labels(Image = {'S3Object' : {'Bucket' : 'Source_Bucket','Name' : imageName}},MinConfidence = 90)
    moderationLabel = response['ModerationLabels']
    moderationLabelLenght = int(len(moderationLabel))
    if moderationLabelLenght > 0:
        print(moderationLabel)
        rsp = s3.copy_object(Bucket = 'Destinated_Bucket', CopySource={'Bucket': 'Source_Bucket', 'Key': imageName},Key = imageName)
        resp = s3.delete_object(Bucket = 'Source_Bucket',Key = imageName)
        print(resp)
        print('Image Deleted')
    else:
        print("Image Tested, nothing to worry.Its all Good.:D")